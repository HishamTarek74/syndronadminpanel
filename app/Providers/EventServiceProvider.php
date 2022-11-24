<?php

namespace App\Providers;

use App\Models\Customer;
use App\Events\CardUpdatedEvent;
use App\Events\OwnerRequestEvent;
use App\Listeners\CardUpdatedListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\OwnerRequestListener;
use App\Events\OwnerRequestRefusedEvent;
use App\Events\OwnerRequestAcceptedEvent;
use App\Observers\PhoneVerificationObserver;
use App\Listeners\OwnerRequestRefusedListener;
use App\Listeners\OwnerRequestAcceptedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OwnerRequestEvent::class => [
            OwnerRequestListener::class,
        ],
        OwnerRequestAcceptedEvent::class => [
            OwnerRequestAcceptedListener::class,
        ],
        OwnerRequestRefusedEvent::class => [
            OwnerRequestRefusedListener::class,
        ],
        CardUpdatedEvent::class => [
            CardUpdatedListener::class,
        ],
        \App\Events\FeedbackSent::class => [
            \App\Listeners\SendFeedbackMessage::class,
        ],
        \App\Events\VerificationCreated::class => [
            \App\Listeners\SendVerificationCode::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Customer::observe(PhoneVerificationObserver::class);
    }
}
