<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height blue"
        dark
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
            lg="3"
          >
            <v-card class="elevation-12 pa-5">
              <div align="center" justify="center">
                <v-img src="/dist/img/caps-lock.svg" class="mb-4" width="100px" contain></v-img>
              </div>
              <h1 class="headline text-center">SELAMAT DATANG</h1>
              <v-card-text>
                <v-form ref="form" v-model="valid" lazy-validation>
                  <v-text-field
                    label="NIS"
                    v-model="nis"
                    prepend-icon="mdi-account"
                    type="text"
                    required
                    :rules="nisRules"
                  />

                  <v-text-field
                    id="password"
                    label="Password"
                    v-model="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    required
                    :rules="passwordRules"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn :disabled="!valid" @click="submit" color="yellow" block rounded>Login</v-btn>
              </v-card-actions>
              <h1 class="caption text-center mt-3">{{ author }}</h1>
            </v-card>
          </v-col>
        </v-row>
        <Alert></Alert>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import store from '../store'
import axios from 'axios'
import Alert from '../components/Alert'
export default {
  name: 'Login',
  components: {
    Alert
  },
  data() {
    return {
      author: 'Muhammad Zulfi',
      valid: true,
      nis: '',
      nisRules: [
        v => !!v || 'Masukkan Nis'
      ],
      password: '',
      passwordRules: [
        v => !!v || 'Masukkan Password'
      ],
    }
  },
  methods: {
    submit() {
      // console.log('login')
      if (this.$refs.form.validate()) {
        let formData = {
          'nis': this.nis,
          'password': this.password
        }
        axios.post('/api/login', formData)
        .then((response) => {
          console.log(response)
          let res = response.data
          if (res.status === 'success') {
            // store.commit('SET_TOKEN', res.data.api_token)
            
            let user = res.data
            store.dispatch('auth/set', {
              nama: user.nama,
              nis: user.nis,
              kelas: user.kelas.nama,
              token: user.api_token
            })

            if(store.getters['auth/isAuth']) {
              this.$router.push('/')
            }
          }
        })
        .catch((error) => {
          let res = error.response.data
          store.commit('SET_ERRORS', res.message)
          console.log(store.state.errors)
          store.dispatch('alert/set', {
            status: true,
            color: 'error',
            text: res.message
          })
        })
      }
    }
  }
}
</script>