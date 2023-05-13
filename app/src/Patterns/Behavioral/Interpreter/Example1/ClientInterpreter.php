<?

namespace App\Patterns\Behavioral\Interpreter\Example1;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

class ClientInterpreter
{
    public function run()
    {
        // Create the expressions
        $discountExpression = new DiscountExpression(10);
        $optionsExpression = new OptionsExpression();
        $productExpression = new ProductExpression();
        $totalExpression = new TotalExpression();

        // Define the context
        $context = [
            'total' => 100, // Add the "total" key with the appropriate value
            'total_amount' => 100, // Existing key/value pairs
            'options' => [
                ['name' => 'Option 1', 'value' => 'Value 1'],
                ['name' => 'Option 2', 'value' => 'Value 2'],
            ],
            'product' => ['name' => 'Product 1', 'quantity' => 2],
        ];


        // Create the invoice expression with all the sub-expressions
        $invoiceExpression = new InvoiceExpression([$discountExpression, $optionsExpression, $productExpression, $totalExpression]);

        // Interpret the invoice expression
        $invoice = $invoiceExpression->interpret($context);

        // Output the invoice
        echo $invoice;
    }
}
