<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class EditProfileAction
{
    use AsAction;

    public function handle(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
