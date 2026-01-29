# Resolución Prueba Técnica PHP 

## Correción de bug (Tarea 1)

---

**Bug encontrado**: En PriceCalculator no se estaba recogiendo correctamente las cantidades de los productos, simplemente multiplicaba por 1, por lo tanto nunca
tenía en cuenta la cantidad de productos reales.

**Solución**: Se modificó la multiplicación para que recogiese el valor en el array de cantidad en cada producto.

---

## Funcionalidad nueva (Tarea 2)

**Funcionalidad planteada**: Se solicita que cuando no se trate de un usuario invitado, reciba un 5% adicional de descuento sobre el total.

**Solución**: Se modificó para que, primero, hiciese una comprobación (True/False) de si la compra es realizada por un invitado o no.
Y posteriormente, dependiendo de la comprobación, o bien hace el descuento general, o bien hace el descuento general y adicionalemnte el 5% extra sobre el total con descuento por no ser invitado.

## Decisión técnica relevante:
En un principio, se podría plantear la **siguiente solución** a la tarea 2:

```php
    if ($order->isGuest()) {
        $total = $total - ($total * ($discount / 100));
    } else {
        $total = ($total - ($total * ($discount / 100))) * 0.95;
    }
```

Pero **por legibilidad** consideré que sería más eficiente el código propuesto al evitar nestear if dentro de otros if.

```php
    $total = $order->isGuest()
        ? $total - ($total * ($discount / 100))
        : ($total - ($total * ($discount / 100))) * 0.95;
```