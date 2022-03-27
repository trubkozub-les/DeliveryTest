<?php
echo (
'<div>
    <form id="delivery_list">
        <label for="delivery">Калькулятор доставки посылок между Москвой, Петербургом и Казанью</label>
        <fieldset id="delivery">
            <div>
                <label for="source1">Откуда</label>
                <input name="source1" type="text" id="source1">
                <label for="destination1">Куда</label>
                <input name="destination1" type="text" id="destination1">
                <label for="weight1">Вес</label>
                <input name="weight1" type="number" min="0.0" max="10" step="0.1" id="weight1">
            </div>
            <div>
                <label for="source2">Откуда</label>
                <input name="source2" type="text" id="source1">
                <label for="destination2">Куда</label>
                <input name="destination2" type="text" id="destination2">
                <label for="weight2">Вес</label>
                <input name="weight2" type="number" min="0.0" max="10" step="0.1" id="weight2">
            </div>
            <div>
                <label for="source3">Откуда</label>
                <input name="source3" type="text" id="source1">
                <label for="destination3">Куда</label>
                <input name="destination3" type="text" id="destination3">
                <label for="weight3">Вес</label>
                <input name="weight3" type="number" min="0.0" max="10" step="0.1" id="weight3">
            </div>
            <div>
                <label for="company">Компания</label>
                <select name="company" id="company">
                    <option value="fast">Быстрая</option>
                    <option value="slow">Медленная</option>
                    <option value="all">Все</option>
                </select>
            </div>
            <div>
                <input type="submit" name="submit" value="Посчитать">
            </div>
        </fieldset>
    </form>
</div>');
