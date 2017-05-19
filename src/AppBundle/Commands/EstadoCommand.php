<?php
namespace AppBundle\Commands;

use BoShurik\TelegramBotBundle\Telegram\Command\AbstractCommand;
use BoShurik\TelegramBotBundle\Telegram\Command\PublicCommandInterface;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\Message;

class EstadoCommand extends AbstractCommand implements PublicCommandInterface
{

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return '/estado';
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return 'Cómo estoy';
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BotApi $api, Message $message)
    {
        $option = $message->getText();
        $options = explode('/estado ', $option);

        if(count($options)>1)
            $option = $options[1];
        else
            $option = null;

        if(strtoupper($option) == 'INVIERNO')
            $text = "En invierno en Córdoba se está bien!!";
        else
            $text = "Hace más calor que jodiendo debajo de un plástico!!!";
        $api->sendMessage($message->getChat()->getId(), $text, 'markdown');
    }
}
