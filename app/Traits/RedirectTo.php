<?php
/**
 * Created By Dede Rusliandi
 *
 * @Filename     redirectTo.php
 * @LastModified 8/4/19 10:54 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits;
use Brian2694\Toastr\Facades\Toastr;

trait RedirectTo
{
    /**
     * @param $url
     * @param $message
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessCreate($url, $message)
    {
        Toastr::success(__('global.create_successfully',['name' => $message]), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessUpdate($url, $message)
    {
        Toastr::success(__('global.update_successfully',['name' => $message]), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessDelete($url, $message)
    {
        Toastr::success(__('global.delete_successfully',['name' => $message]), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectFailed($url, $message)
    {
        Toastr::error(__('global.send_unsuccessfully',['name' => $message]), 'Failed', ["positionClass" => "toast-top-right"]);
        return redirect($url);
    }
}