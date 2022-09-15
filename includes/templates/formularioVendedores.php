<fieldset>
    <legend>Informacion general</legend>

    <label for="Nombre">Nombre</label>
    <input type="text" id="Nombre" name="Nombre" placeholder="Nombre..." maxlength="45" value="<?php echo scapeHTML($Vendedor->Nombre); ?>">

    <label for="Apellido">Apellido</label>
    <input type="text" id="Apellido" name="Apellido" placeholder="Apellido.." value="<?php echo scapeHTML($Vendedor->Apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacion extra</legend>

    <label for="Numero">Numero telefonico</label>
    <div class="telefono">
        <select name="region" id="reigon" class="region">
            <option value="+503">+503</option>
            <option value="+504">+504</option>
            <option value="+505">+505</option>
        </select>
        <input type="tel" id="Numero" name="Telefono" placeholder="Numero telefonico..." min="1" , max="9" value="<?php echo scapeHTML($Vendedor->Telefono); ?>">
    </div>
</fieldset>