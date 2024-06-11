<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\User;
use App\Models\reminders;
use App\Models\credits;

use Carbon\Carbon;

class notify_day_one extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:day_one';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify the accounter for day one remind the credit.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::beginTransaction();
        try{
            $check_remind_date = reminders::whereNull('access_one', 'Kazi')->first();
            $day_one = $check_remind_date->day_one;
            $day_two = $check_remind_date->day_two;
            $day_tree = $check_remind_date->day_tree;
            $day_report = $check_remind_date->day_report;

            $currentDate = Carbon::now()->toDateString(); // e.g., '2024-06-07'

            if ($currentDate == $day_one) {
                $check_credit = credits::whereNull('u_status')->first();
                if($check_credit){
                    $Users = user::get();
                    if (count($Users) > 0) {
                        require base_path("vendor/autoload.php");
                        foreach ($Users as $User) {
                            $mail = new PHPMailer(true); 
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host = env('MAIL_HOST');
                            $mail->SMTPAuth = true;
                            $mail->Username = env('MAIL_USERNAME');
                            $mail->Password = env('MAIL_PASSWORD');
                            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                            $mail->Port = env('MAIL_PORT');
                            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Kazi-Interim [Micro-credit]');
                            $mail->addAddress($User->email);
                            $mail->isHTML(true);
                            $mail->Subject = 'Micro credit notification';
                            $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <title>Notification</title>
                                    <meta charset="UTF-8" />
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
                                </head>
                                <style>
                                    .mainColor{
                                        background-image: linear-gradient(to bottom, var(--tw-gradient-stops)); 
                                        background-color: transparent; 
                                        background: #65A30D;
                                    }
                                    .bodys{
                                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                                        border-radius: 10px;
                                        border: 1px solid #E5E7EB;
                                    }
                                    .rds{
                                        border-radius: 10px;
                                    }
                                    .hr_colr{
                                        border: 1px solid #E5E7EB;
                                    }
                                    .flexo{
                                        display: flex; 
                                        flex-wrap: wrap; 
                                        gap: 0.5rem; 
                                        justify-content: flex-start; 
                                    }
                                    .py3{
                                        padding-top: 0.75rem;
                                        padding-bottom: 0.75rem; 
                                    }
                                </style>
                                <body style="font-family: Arial, sans-serif;">
                                    <div class="bodys" style="max-width: 600px; margin: 0 auto; padding: 10px;">
                                        <div class="mainColor rds" style="padding: 20px; text-align: left;">
                                            <p>
                                                <span style="font-weight: bold; padding-bottom: 1.25rem;">Kazi Interim - [Micro-credit]</span>
                                            </p>
                                            <h1>Rappel de crédit impayé</h1>
                                        </div>
                                        <div style="background-color: #ffffff; padding: 20px;">
                                            <p>Bonjour cher agent de Kazi Interim,</p>
                                            <p>Je voudrais vous rappeler qu\'il y a un crédit impayé qui a été pris. Veuillez vous assurer que cela est géré dans la prochaine paie.</p>
                                            <p>Je vous rappellerai encore à la date sélectionnée dans l\'application de rappel</p>
                                            <p style="font-size: 14px;">Best regards,<br>Kazi Interim Support Team</p>
                                        </div>
                                    </div>
                                </body>
                            </html>
                            ';
                            $mail->send();
                        }
                    }
                }
            } elseif ($currentDate == $day_two) {
                $check_credit = credits::whereNull('u_status')->first();
                if($check_credit){
                    $Users = user::get();
                    if (count($Users) > 0) {
                        require base_path("vendor/autoload.php");
                        foreach ($Users as $User) {
                            $mail = new PHPMailer(true); 
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host = env('MAIL_HOST');
                            $mail->SMTPAuth = true;
                            $mail->Username = env('MAIL_USERNAME');
                            $mail->Password = env('MAIL_PASSWORD');
                            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                            $mail->Port = env('MAIL_PORT');
                            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Kazi-Interim [Micro-credit]');
                            $mail->addAddress($User->email);
                            $mail->isHTML(true);
                            $mail->Subject = 'Micro credit notification';
                            $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <title>Notification</title>
                                    <meta charset="UTF-8" />
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
                                </head>
                                <style>
                                    .mainColor{
                                        background-image: linear-gradient(to bottom, var(--tw-gradient-stops)); 
                                        background-color: transparent; 
                                        background: #65A30D;
                                    }
                                    .bodys{
                                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                                        border-radius: 10px;
                                        border: 1px solid #E5E7EB;
                                    }
                                    .rds{
                                        border-radius: 10px;
                                    }
                                    .hr_colr{
                                        border: 1px solid #E5E7EB;
                                    }
                                    .flexo{
                                        display: flex; 
                                        flex-wrap: wrap; 
                                        gap: 0.5rem; 
                                        justify-content: flex-start; 
                                    }
                                    .py3{
                                        padding-top: 0.75rem;
                                        padding-bottom: 0.75rem; 
                                    }
                                </style>
                                <body style="font-family: Arial, sans-serif;">
                                    <div class="bodys" style="max-width: 600px; margin: 0 auto; padding: 10px;">
                                        <div class="mainColor rds" style="padding: 20px; text-align: left;">
                                            <p>
                                                <span style="font-weight: bold; padding-bottom: 1.25rem;">Kazi Interim - [Micro-credit]</span>
                                            </p>
                                            <h1>Rappel de crédit impayé</h1>
                                        </div>
                                        <div style="background-color: #ffffff; padding: 20px;">
                                            <p>Bonjour cher agent de Kazi Interim,</p>
                                            <p>Je voudrais vous rappeler qu\'il y a un crédit impayé qui a été pris. Veuillez vous assurer que cela est géré dans la prochaine paie.</p>
                                            <p>Je vous rappellerai encore à la date sélectionnée dans l\'application de rappel</p>
                                            <p style="font-size: 14px;">Best regards,<br>Kazi Interim Support Team</p>
                                        </div>
                                    </div>
                                </body>
                            </html>
                            ';
                            $mail->send();
                        }
                    }
                }
            } elseif ($currentDate == $day_tree) {
                $check_credit = credits::whereNull('u_status')->first();
                if($check_credit){
                    $Users = user::get();
                    if (count($Users) > 0) {
                        require base_path("vendor/autoload.php");
                        foreach ($Users as $User) {
                            $mail = new PHPMailer(true); 
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host = env('MAIL_HOST');
                            $mail->SMTPAuth = true;
                            $mail->Username = env('MAIL_USERNAME');
                            $mail->Password = env('MAIL_PASSWORD');
                            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                            $mail->Port = env('MAIL_PORT');
                            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Kazi-Interim [Micro-credit]');
                            $mail->addAddress($User->email);
                            $mail->isHTML(true);
                            $mail->Subject = 'Micro credit notification';
                            $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <title>Notification</title>
                                    <meta charset="UTF-8" />
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
                                </head>
                                <style>
                                    .mainColor{
                                        background-image: linear-gradient(to bottom, var(--tw-gradient-stops)); 
                                        background-color: transparent; 
                                        background: #65A30D;
                                    }
                                    .bodys{
                                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                                        border-radius: 10px;
                                        border: 1px solid #E5E7EB;
                                    }
                                    .rds{
                                        border-radius: 10px;
                                    }
                                    .hr_colr{
                                        border: 1px solid #E5E7EB;
                                    }
                                    .flexo{
                                        display: flex; 
                                        flex-wrap: wrap; 
                                        gap: 0.5rem; 
                                        justify-content: flex-start; 
                                    }
                                    .py3{
                                        padding-top: 0.75rem;
                                        padding-bottom: 0.75rem; 
                                    }
                                </style>
                                <body style="font-family: Arial, sans-serif;">
                                    <div class="bodys" style="max-width: 600px; margin: 0 auto; padding: 10px;">
                                        <div class="mainColor rds" style="padding: 20px; text-align: left;">
                                            <p>
                                                <span style="font-weight: bold; padding-bottom: 1.25rem;">Kazi Interim - [Micro-credit]</span>
                                            </p>
                                            <h1>Rappel de crédit impayé</h1>
                                        </div>
                                        <div style="background-color: #ffffff; padding: 20px;">
                                            <p>Bonjour cher agent de Kazi Interim,</p>
                                            <p>Je voudrais vous rappeler qu\'il y a un crédit impayé qui a été pris. Veuillez vous assurer que cela est géré dans la prochaine paie.</p>
                                            <p>Je vous rappellerai encore à la date sélectionnée dans l\'application de rappel</p>
                                            <p style="font-size: 14px;">Best regards,<br>Kazi Interim Support Team</p>
                                        </div>
                                    </div>
                                </body>
                            </html>
                            ';
                            $mail->send();
                        }
                    }
                }
            } elseif ($currentDate == $day_report) {
                $getCredits = credits::whereNull('u_status')->limit(5)->get();
                if($getCredits){
                    foreach ($getCredits as $item) {
                        $item->u_paid = $item->u_amount;
                        $item->u_date_paid = $currentDate;
                        $item->u_status = '1';
                        $item->save();
                    }
                }
            } else {

            }

            
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
        }
    }
}
