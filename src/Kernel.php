<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
    }

    public function handle(Request $request): Response
    {
        $message = "Thank you for your request, you accessed $request->path";
        $response = new Response(body: $message);
        return $response;
    }
}
