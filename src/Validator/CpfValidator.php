<?php

namespace App\Validator;

use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CpfValidator extends ConstraintValidator
{
    const CPF_REGEXP = '/^(\d{3}\.\d{3}\.\d{3}\-\d{2})$/';

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\Cpf */

        if (!$constraint instanceof Cpf) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__ . '\Cpf');
        }

        if (!$this->maskValidador($value)) {
            $this->context->addViolation(
                $constraint->message
            );

            return false;
        }
    }

    /**
     * Verificando se está em um formato válido
     *
     * @param string $value
     * @param Cpf $constraint
     * @return bool
     */
    protected function maskValidador($value)
    {
        if (!preg_match(self::CPF_REGEXP, $value)) {
            return false;
        }

        return true;
    }
}
