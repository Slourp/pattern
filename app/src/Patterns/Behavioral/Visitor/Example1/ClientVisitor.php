<?

namespace App\Patterns\Behavioral\Visitor\Example1;


class ClientVisitor
{



    public function run()
    {

        // create products
        $tshirt = new Tshirt();
        $mug = new Mug();
        $bag = new Bag();

        $products = [$tshirt, $mug, $bag];

        // create visitors
        $addImageVisitor = new AddImageVisitor("/path/to/image.jpg");
        $addTextVisitor = new AddTextVisitor("Hello, world!");
        $chooseColorVisitor = new ChooseColorVisitor("red");

        $visitors = [$addImageVisitor, $addTextVisitor, $chooseColorVisitor];

        // apply each visitor to each product
        foreach ($products as $product) {
            foreach ($visitors as $visitor) {
                $product->accept($visitor);
            }
        }
    }
}
