<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Ship\Parents\Actions\Action;

class SayHelloAction extends Action
{
    public function run()
    {
        // $var = app(Task::class)->run($arg1, $arg2);
        return 'Hello World!';
    }
}
