<div class="jumbotron text-center">
    <h1>David's Equipment</h1>
</div>
<div class="row">
    <div class="col-md-4">
        Equipment Sets
        <form method="post" action="/Welcome/Update">
            <select class="form-control form-control-sm" name="Set">
                <option value="1">Default</option>
                <option value="2">Plat</option>
            </select>
            <input type="submit">
        </form>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-6">
        <div class="well containerdiv" style="height: 400px;">
            <img class="center-block parent" src="/assets/images/{character}" style="width: auto; height: 100%;"/>
            <img class="weapon" src="/assets/images/items/{weapon}"/>
            <img class="helmet" style="width:80%; height:auto" src="/assets/images/items/{helmet}"/>
        </div>
    </div>
</div>