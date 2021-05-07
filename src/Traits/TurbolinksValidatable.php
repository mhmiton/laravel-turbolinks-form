<?php
    
namespace Mhmiton\LaravelTurbolinksForm\Traits;

use Illuminate\Validation\ValidationException;

trait TurbolinksValidatable
{
    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($request->header('turbolinks-form')) {
            $response = $this->invalid($request, $e);

            $validationException = new ValidationException($e->validator, $response);

            return $validationException->getResponse();
        }

        return parent::convertValidationExceptionToResponse($e, $request);
    }
}