<template>
  <v-app id="inspire">
    <v-app-bar app dark color="blue">
      <v-toolbar-title>Computer Based Test</v-toolbar-title>
      <v-spacer></v-spacer>
      <h1>00:39:45</h1>
    </v-app-bar>
    <v-content class="grey lighten-4">
      <v-container class="pb-0">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card>
              <v-card-title>Paket Soal Matematika</v-card-title>
              <v-card-subtitle>Kelas 10 TKJ 2</v-card-subtitle>
              <v-spacer></v-spacer>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <v-container class="pt-0 mb-5">
        <v-row>
          <v-col md="8" cols="12">
            <v-card>
              <v-card-text>Soal 5</v-card-text>
              <v-divider></v-divider>
              <!-- <v-card-text>
                <v-img src="https://picsum.photos/seed/picsum/300/200" width="500"></v-img>
                <audio src="/dummy/audio.mp3" controls></audio>
                <video src="/dummy/video.mp4" class="w-100" controls></video>
              </v-card-text> -->
              <v-card-text>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, officiis repellendus dolor natus quibusdam est voluptatum tempore quidem labore quaerat veniam alias reprehenderit a in sapiente ad magni quam numquam dolorum tempora fugit officia nam quod! Perferendis eaque similique, provident fuga dolor distinctio, modi mollitia tenetur voluptatem, aliquam ratione minima.
              </v-card-text>
              <div class="mx-6">
                <v-radio-group>
                  <v-radio class="my-3">
                    <template v-slot:label>
                      <b><i>Jawaban A</i></b>
                    </template>
                  </v-radio>
                  <v-radio class="my-3">
                    <template v-slot:label>
                      <v-img src="https://picsum.photos/seed/picsum/300/200" width="100"></v-img>
                    </template>
                  </v-radio>
                  <v-radio label="Jawaban A" class="my-3"></v-radio>
                  <v-radio label="Jawaban A" class="my-3"></v-radio>
                </v-radio-group>
              </div>
              <v-divider></v-divider>
              <v-card-actions class="d-flex justify-space-between">
                <v-btn color="warning" class="pr-4" rounded><v-icon dark small left>mdi-arrow-left</v-icon>Kembali</v-btn>
                <v-checkbox :label="`Ragu-ragu`"></v-checkbox>
                <v-btn color="warning" class="pl-4" rounded>Lanjut<v-icon dark small right>mdi-arrow-right</v-icon></v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col md="4" cols="12">
            <v-card>
              <v-card-text>List Soal</v-card-text>
              <v-divider></v-divider>
              <v-row class="mx-1">
                <v-flex v-for="soal in jml_soal" :key="soal" class="w-20 text-center pt-4">
                  <v-btn color="success" :outlined="soal == 5" :disabled="soal == 5">{{ soal }}</v-btn>
                </v-flex>
              </v-row>
              <v-card-actions class="mt-4">
                <v-btn block color="red" dark>SELESAI</v-btn>
              </v-card-actions>
            </v-card>
            <v-card class="mt-4">
              <v-alert text prominent type="error" dense>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum illo porro animi exercitationem iste rerum odit magni aliquid numquam hic.
              </v-alert>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  name: 'Ujian',
  data() {
    return {
      jml_soal: 25
    }
  }
}
</script>

<style scoped>
.w-20 {
  width: 20%;
  max-width: 20%;
}
</style>
