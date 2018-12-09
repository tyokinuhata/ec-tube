<template>
    <div>
        <div class="lanes-wrapper">
            <div class="lanes">
                <div class="lane" :class="'lane' + index" v-for="(sushi, index) in muchSushiA">
                    <div v-if="sushi.id !== 0" class="dish">
                        <img :src="sushi.img" alt="" class="sushi" data-toggle="modal" :data-target="'#modal' + sushi.id" @click="changeCartId(sushi.id)">
                    </div>
                </div>
            </div>
        </div>

        <div class="lanes-wrapper">
            <div class="lanes">
                <div class="lane" :class="'lane' + index" v-for="(sushi, index) in muchSushiB">
                    <div v-if="sushi.id !== 0" class="dish">
                        <img :src="sushi.img" alt="" class="sushi" data-toggle="modal" :data-target="'#modal' + sushi.id" @click="changeCartId(sushi.id)">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" :id="'modal' + sushi.id" tabindex="-1" role="dialog" :aria-labelledby="'modalLabel' + sushi.id" aria-hidden="true" v-for="(sushi, index) in muchSushiA">
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
                        <input type="number" class="form-control d-inline col-md-3" name="number" v-model="cart.number" min="1" max="10" required>
                        <button type="button" class="btn btn-primary" @click="addCart">食べる！</button>
                        <p>{{ msg }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <p class="text-right mt-2 h3">🍣 現在{{ dishes }}枚食べました 🍣</p>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      cart: {
        id: 1,
        number: 1,
      },
      msg: '',
      user: [],
      muchSushiA: [],
      muchSushiB: [],
      dishes: 0,
    }
  },
  mounted() {
    this.getSushi()
    this.getUser()
    this.getCartCount()
  },
  methods: {
    getSushi() {
      axios.get('/foods/list')
        .then(res => {
          let muchSushi = res.data
          const data = {
            'id': 0,
            'name': '',
            'description': '',
            'img': '',
            'price': '',
          }

          for (let i = 0; i < 8; i++) {
            muchSushi.push(data)
          }

          this.muchSushiA = _.shuffle(muchSushi)
          this.muchSushiB = _.shuffle(muchSushi)
        })
    },
    getUser() {
      axios.get('/user')
        .then(res => {
          this.user = res.data
        })
    },
    changeCartId(id) {
      this.cart.id = id
      this.msg = ''
    },
    getCartCount() {
      axios.get('/carts/count')
        .then(res => {
          this.dishes = res.data
        })
    },
    addCart() {
      axios.post('/carts/store', {
        'number': this.cart.number,
        'user_id': this.user.id,
        'food_id': this.cart.id,
      })
        .then(res => {
          this.dishes += Number(this.cart.number)
          this.msg = 'ヘイ！らっしゃい！'
        })
    }
  }
}
</script>
