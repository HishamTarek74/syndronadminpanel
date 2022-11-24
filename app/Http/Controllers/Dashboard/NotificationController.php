<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Store;
use App\Models\Seller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CertifiedStore;
use App\Models\NotificationData;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use App\Notifications\CustomNotification;
use App\Http\Requests\NotificationRequest;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NotificationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notifications = NotificationData::latest()->paginate();
     
        return view('dashboard.notifications.index', compact('notifications'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countries = Country::all();

        return view('dashboard.notifications.create', compact('countries'));
    }

    /**
     * @param NotificationRequest $request
     * @return RedirectResponse
     */
    public function store(NotificationRequest $request)
    {
        // Store data to show in dashboard index page
        $data = $this->storeNotificationData($request);

        //send for all
        if($request->users == 'all') {
            $this->sendToSellers($request, $data);
            $this->sendToStores($request, $data);
            $this->sendToCertifiedStores($request, $data);

            flash(trans('notifications.sent'));

            return back();
        } 

        // send for sellers
        if($request->users == 'sellers') {
            if ($this->getSellerNotifiables($request)) {
                $this->sendToSellers($request, $data);
            }
        } 
        

        // send for stores
        if($request->users == 'stores') {
            if ($this->getStoreNotifiables($request)) {
                $this->sendToStores($request, $data);
            }
        }

        // send for certified stores
        if($request->users == 'certified_stores') {
            if ($this->getCertifiedStoreNotifiables($request)) {
                $this->sendToCertifiedStores($request, $data);
            }
        }

        flash(trans('notifications.sent'));

        return back();
    }

    /**
     * Store notification data to show in dashboard index page
     *
     * @return void
     */
    protected function storeNotificationData($request)
    {
        return NotificationData::create([
            'title' => $request->title,
            'to' => $request->users,
            'cities' => $request->cities ? $request->cities : [0]
        ]);
    }

    protected function sendToSellers($request, $data) 
    {
        $this->getSellerNotifiables($request)->chunk(2, function ($notifiables) use ($request, $data) {
            Notification::send(
                $notifiables,
                new  CustomNotification([
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id' => (int) auth()->id(),
                    'data' => $data->id
                ])
            );
        });
    }

    protected function sendToStores($request, $data) 
    {
        $this->getStoreNotifiables($request)->chunk(2, function ($notifiables) use ($request, $data) {
            Notification::send(
                $notifiables,
                new  CustomNotification([
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id' => (int) auth()->id(),
                    'data' => $data->id
                ])
            );
        });
    }

    protected function sendToCertifiedStores($request, $data) 
    {
        $this->getCertifiedStoreNotifiables($request)->chunk(2, function ($notifiables) use ($request, $data) {
            Notification::send(
                $notifiables,
                new  CustomNotification([
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id' => (int) auth()->id(),
                    'data' => $data->id
                ])
            );
        });
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getSellerNotifiables(Request $request)
    {
        $notifiables = null;

        if ($request->input('check_all_cities') == 'on') {
            $notifiables = Seller::query();
        }

        if ($ids = $request->input('students_notifiables', [])) {
            $notifiables = Student::query();
            $notifiables =  $notifiables->whereIn('id', $ids);
        }

        return $notifiables;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getStoreNotifiables(Request $request)
    {
        $notifiables = null;

        if ($request->input('check_all_cities') == 'on') {
            $notifiables = Store::query();
        }

        return $notifiables;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getCertifiedStoreNotifiables(Request $request)
    {
        $notifiables = null;

        if ($request->input('check_all_cities') == 'on') {
            $notifiables = CertifiedStore::query();
        }

        return $notifiables;
    }

    /**
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(\App\Models\Notification $notification)
    {
        $notification->markAsRead();

        return view('dashboard.notifications.show', compact('notification'));
    }

    /**
     * @param \App\Models\NotificationData $notification
     * @return RedirectResponse
     */
    public function destroy(\App\Models\NotificationData $notification)
    {
        NotificationData::where('id', $notification->id)->delete();

        flash(trans('notifications.messages.deleted'));

        return redirect()->route('dashboard.notifications.index');
    }
}
