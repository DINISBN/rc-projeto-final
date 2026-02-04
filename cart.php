<style>
  .cart-icon {
    position: relative;
    cursor: pointer;
    padding: 0.5rem;
    transition: transform 0.2s ease;
    display: inline-block;
    text-decoration: none;
  }

  .cart-icon:hover {
    transform: scale(1.1);
  }

  .cart-icon svg {
    width: 24px;
    height: 24px;
    fill: none;
    stroke: #333;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    display: block;
  }

  .cart-badge {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #e31e24;
    color: #fff;
    font-size: 0.5rem;
    font-weight: bold;
    padding: 0.2rem 0.4rem;
    border-radius: 50%;
    min-width: 18px;
    text-align: center;
    line-height: 1;
  }
</style>

<a href="/carrinho.php" class="cart-icon">
  <svg viewBox="0 0 24 24">
    <circle cx="9" cy="21" r="1"></circle>
    <circle cx="20" cy="21" r="1"></circle>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
  </svg>
  <span class="cart-badge"><?php echo isset($cart_count) ? $cart_count : 0; ?></span>
</a>