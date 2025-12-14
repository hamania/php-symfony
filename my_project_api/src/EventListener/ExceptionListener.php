<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

final class ExceptionListener
{
    #[AsEventListener]
    public function onExceptionEvent(ExceptionEvent $event): void
    {
        $r = $event->getRequest();
        if(!str_starts_with($r->getPathInfo(), "/api")){
            return;
        }
        $e = $event->getThrowable();

        $response = new JsonResponse([
            "error" => $e->getMessage(),
        ]);

        $event->setResponse($response);
    }
}
