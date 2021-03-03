<form action="/admin/stores/store" method="post">
    <h1>Criar Loja</h1>
    <div>
        <label>Nome Loja</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>Descrição</label>
        <input type="text" name="description">
    </div>
    <div>
        <label>Telefone</label>
        <input type="text" name="phone">
    </div>
    <div>
        <label>Celular/Whatsapp</label>
        <input type="text" name="mobile_phone">
    </div>
    <div>
        <label>Slug</label>
        <input type="text" name="slug">
    </div>
    <div>
        <label>Usuário</label>
        <select name="user">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Criar Loja <?= -12 < null ?></button>
    </div>
</form>