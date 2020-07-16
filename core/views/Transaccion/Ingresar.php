<div class="container">
  <section>
    <form method="POST" action="index.php?controller=TransaccionController&action=Ingresar">
      <div class="form-group">
        <label>Monto</label>
        <input type="number" min="1" step="any" class="form-control" name="monto">
      </div>
      <div class="form-group">
        <label>Porque va a realizar esta transacción?</label>
        <textarea class="form-control" rows="3" name="descripcion"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
  </section>
</div>