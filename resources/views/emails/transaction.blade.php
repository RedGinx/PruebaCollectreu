<h1>Transacción realizada con éxito</h1>

<p><strong>Comprador:</strong> {{ $transaction->buyer->name }}</p>
<p><strong>Vendedor:</strong> {{ $transaction->listing->seller->name }}</p>
<p><strong>Carta:</strong> {{ $transaction->listing->card->name }}</p>
<p><strong>Cantidad comprada:</strong> {{ $transaction->quantity }}</p>
<p><strong>Total:</strong> ${{ $transaction->total_price }}</p>

<p>Gracias por tu compra.</p>
