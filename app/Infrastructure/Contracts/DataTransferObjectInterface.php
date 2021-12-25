<?php

namespace Infrastructure\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface DataTransferObjectInterface
{
    /**
     *  Returns an object containing data from a request.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromRequest(FormRequest $request): object;

    /**
     * Returns an object containing data from a request to create a resource.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromStoreRequest(FormRequest $request): object;

    /**
     * Returns an object containing data from a request to update a resource.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromUpdateRequest(FormRequest $request): object;

    /**
     * Returns an object containing data from a request to update a resource.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromDeleteRequest(FormRequest $request): object;

    /**
     * Returns an object containing data from a request to select a resource.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromIndexRequest(FormRequest $request): object;

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return object
     */
    public static function fromShowRequest(FormRequest $request): object;
}
