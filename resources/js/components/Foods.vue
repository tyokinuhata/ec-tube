<template>
    <div>
        <div class="lanes-wrapper">
            <div class="lanes">
                <div class="lane" v-for="sushi in muchSushi">
                    <div class="dish">
                        <img :src="sushi.img" alt="" class="sushi" data-toggle="modal" :data-target="'#modal' + sushi.id">
                    </div>

                    <div class="modal fade" :id="'modal' + sushi.id" tabindex="-1" role="dialog" :aria-labelledby="'modalLabel' + sushi.id" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">食べますか？</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="h4 mt-2">{{ sushi.name }}</p>
                                    <img :src="sushi.img" alt="" width="100">
                                    <p>{{ sushi.description}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">食べない</button>
                                    <input type="number" class="form-control d-inline col-md-3" name="number" value="1" min="1">
                                    <button type="submit" class="btn btn-primary">食べる！</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      muchSushi: []
    }
  },
  mounted() {
    this.getSushi()
  },
  methods: {
    getSushi() {
      axios.get('/foods/get')
        .then((res) => {
          this.muchSushi = res.data
        });
    }
  }
}
</script>
