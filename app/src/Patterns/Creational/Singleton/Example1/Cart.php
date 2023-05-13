<?

namespace App\Patterns\Creational\Singleton\Example1;

class Cart
{
    private static $instance;

    private $items = [];

    private function __construct()
    {
    }

    /**
     * Gets the instance via lazy initialization (created on first usage).
     * Uses the null coalescing assignment operator to simplify the creation of the instance.
     *
     * @return Cart The singleton instance of the Cart class.
     */
    public static function getInstance(): Cart
    {
        // If the instance is not already set, it creates a new instance and assigns it to the static $instance property.
        // If the instance is already set, it simply returns it.
        return static::$instance ??= new static();
    }

    public function addItem($item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
