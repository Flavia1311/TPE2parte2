{literal}
    <section id="template-vue-postear">
        <div v-if="admin!=0" class="mt-4 postar_comentario">
            <h1 class="text-center plato_detalle">{{titulo}}</h1>
            <div class="col-12">
                <form method="POST" @submit="checkForm">
                    <div v-if="errors.length" class="col-12 bg-danger text-center text-light p-3">
                        <p v-for="error in errors">*{{ error }}</p>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <label for="puntaje"> <span>Mi calificacion:</span> </label>
                            <select v-model="puntaje" id="puntaje" class="form-control text-warning puntaje" name="puntaje">
                                <option value="1"> 1 &#xf005;</option>
                                <option value="2">2 &#xf005;&#xf005; </option>
                                <option value="3">3&#xf005;&#xf005;&#xf005;</option>
                                <option value="4">4&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                <option value="5">5&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-6 m-1">
                            <label for="comentario"> <span>Comentario:</span> </label>
                            <textarea v-model="comentario" id="comentario" class="form-control" name="comentario" cols="20"
                                rows="5" placeholder="Escriba su comentario"></textarea>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-1 m-1">
                                <input class="btn btn-warning text-light" type="submit" value="Comentar">
                            </div>
                        </div>
                </form>

            </div>
        </div>


    </section>

    <section class="mt-4" id="template-vue-comentarios">
        <h1 class="text-center plato_detalle">{{ titulo }}</h1>

        <div class="row mt-4" v-for="comentario in comentarios">
            <div class="col-12 comentario">
                <div class="row">
                    <div class="col-2">

                    </div>
                    <div class="col-12">

                        <p class="text-light">

                            {{ comentario.nombre }}
                        <p class="puntuacion text-warning mt-2"> {{ comentario.puntuacion }} <i class="fas fa-star"></i>
                        </p>
                   
                    <p class="text-light">{{ comentario.comentario }}</p>
                    <div class="eliminar_comentario" v-if="admin == 2">
                        <button class="bg-light " v-on:click="eliminar_comentario(comentario.id)">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>

    </section>

{/literal}