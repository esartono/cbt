(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{45:function(t,a,e){"use strict";e.r(a);var n=e(0),r=e(4),s=e.n(r),o={name:"Beranda",data:function(){return{headers:[{text:"Nama Ujian",align:"center"},{text:"Mata Pelajaran",align:"center"},{text:"Waktu",align:"center"},{text:"Jumlah Soal",align:"center"},{text:"Status",align:"center"}]}},computed:{token:function(){return n.a.state.auth.token},check_password:function(){return n.a.state.check_password}},mounted:function(){console.log("beranda"),s.a.get("/api/password/check",{headers:{Authorization:"Bearer "+this.token,"Content-Type":"application/json"}}).then((function(t){var a=t.data;n.a.commit("SET_CHECK_PASSWORD",a.status)}))}},i=e(1),c=Object(i.a)(o,(function(){var t=this.$createElement,a=this._self._c||t;return a("v-row",[a("v-col",{attrs:{cols:"12",sm:"12",md:"8"}},[this.check_password?a("v-alert",{attrs:{prominent:"",type:"error"}},[a("v-row",{attrs:{align:"center"}},[a("v-col",{staticClass:"grow"},[this._v("Sebelum memulai ujian harap mengganti kata sandi terlebih dahulu.")]),this._v(" "),a("v-col",{staticClass:"shrink"},[a("v-btn",{attrs:{to:"pengaturan"}},[this._v("Ganti Kata Sandi")])],1)],1)],1):a("v-card",[a("v-toolbar",{attrs:{dense:"",flat:"",color:"blue",dark:""}},[a("v-toolbar-title",[this._v("Daftar Ujian")])],1),this._v(" "),a("v-data-table",{attrs:{headers:this.headers}})],1)],1)],1)}),[],!1,null,null,null);a.default=c.exports}}]);