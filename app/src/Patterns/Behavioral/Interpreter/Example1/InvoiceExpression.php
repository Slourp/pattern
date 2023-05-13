<?

namespace App\Patterns\Behavioral\Interpreter\Example1;


class InvoiceExpression implements Expression
{

    public function __construct(private array $expressions)
    {
    }

    public function interpret(array $context): string
    {
        $invoice = "Invoice:\n";

        foreach ($this->expressions as $expression) {
            $invoice .= $expression->interpret($context) . "\n";
        }

        return $invoice;
    }
}
