<div class="container">

    <div class="row" id="table-hover-row" style="padding-top:25px;">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header" style="background-color: white; border-radius: 10px; overflow:auto;">
                    <h4 class="card-title">Usuarios</h4>
                    <div class="buttons">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear-usuario">
                            Crear usuario
                        </button>
                        <button type="button" class="btn btn-outline-secondary" id="btn-select-usuario">
                            Editar
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="btn-eliminar">
                            Eliminar
                        </button>
                    </div>

                    <div class="table table-striped" style="width:100%;">
                        <table class="table table-hover mb-0" id="tbl-usuarios">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Rol </th>
                                    <th>Estado </th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div class="card-content">

                </div>
            </div>
        </div>
    </div>


</div>


<!-- Modal Crear usuarios-->
<div class="modal fade" id="crear-usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" id="form-crear-usuario">

                    <div class="form-group col-md-6">
                        <label for="basicInput">Email</label>
                        <input type="email" class="form-control" id="txt-email-usuario" name="txt-email-usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="basicInput">Contraseña</label>
                        <input type="text" class="form-control" id="txt-contraseña-usuario" name="txt-contraseña-usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="basicInput">Nombres</label>
                        <input type="text" class="form-control" id="txt-nombre-usuario" name="txt-nombre-usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="basicInput">Apellidos</label>
                        <input type="text" class="form-control" id="txt-apellido-usuario" name="txt-apellido-usuario">
                    </div>

                    <div class="form-group">
                        <label>Rol</label>
                        <div class="form-group">
                            <select class="choices form-select" id="txt-rol-usuario" name="txt-rol-usuario">
                                <option selected value="">Seleccione una opcion</option>
                                <option value="ADMINISTRADOR"> ADMINISTRADOR</option>
                                <option value="USUARIO"> USUARIO</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-crear-usuario">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar usuarios-->
<div class="modal fade" id="editar-usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" id="form-editar-usuario">

                    <div class="form-group ">
                        <label for="basicInput">Email</label>
                        <input type="email" class="form-control" id="editar-txt-id-usuario" name="editar-txt-id-usuario" style="display:NONE;">
                        <input type="email" class="form-control" id="editar-txt-email-usuario" name="editar-txt-email-usuario" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="basicInput">Nombres</label>
                        <input type="text" class="form-control" id="editar-txt-nombre-usuario" name="editar-txt-nombre-usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="basicInput">Apellidos</label>
                        <input type="text" class="form-control" id="editar-txt-apellido-usuario" name="editar-txt-apellido-usuario">
                    </div>
                    <div class="form-check m-3">
                        <div class="checkbox">
                            <input type="checkbox" id="editar-chk-estado-usuario" name="editar-chk-estado-usuario" class="form-check-input">
                            <label for="checkbox">Estado</label>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-editar-usuario">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('Assets/Js/Configuracion.js') ?>"></script>