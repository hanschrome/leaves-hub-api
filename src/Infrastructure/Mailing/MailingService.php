<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;
use Src\Domain\User\IUser;
use Throwable;

class MailingService implements IMailingService
{
    private MailingConfiguration $mailingConfiguration;

    public function __construct(MailingConfiguration $mailingConfiguration)
    {
        $this->mailingConfiguration = $mailingConfiguration;
    }

    public function getMailingConfiguration(): MailingConfiguration
    {
        return $this->mailingConfiguration;
    }

    public function sendMail(IUser $user, string $subject, string $body): bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = $this->getMailingConfiguration()->isSmtpDebug();
            $mail->isSMTP();
            $mail->Host = $this->getMailingConfiguration()->getHost();
            $mail->SMTPAuth = $this->getMailingConfiguration()->isSmtpAuth();
            $mail->SMTPSecure = $this->getMailingConfiguration()->getSmtpSecure();
            $mail->Port = $this->getMailingConfiguration()->getPort();
            $mail->setFrom($this->getMailingConfiguration()->getFromMail(), $this->getMailingConfiguration()->getFromName());
            $mail->addAddress($user->getEmail()->value(), 'User');
            $mail->isHTML();

            if ($mail->SMTPAuth) {
                $mail->Username = $this->getMailingConfiguration()->getUsername();
                $mail->Password = $this->getMailingConfiguration()->getPassword();
            }

            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            $success = true;
        } catch (Throwable $e) {
            $success = false;
            (new Logger('Mailing'))->addRecord(Logger::ERROR, $e->getMessage(), ['MailingService error']);
        }

        return $success;
    }
}
