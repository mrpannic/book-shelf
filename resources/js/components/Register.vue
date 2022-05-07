<template>
  <div class="flex justify-center items-center h-screen">
    <div class="flex flex-col register place-items-center content-center">
        <div class="flex flex-col w-full input-field">
            <label class="block" for="name">Email</label>
            <input type="text" v-model="email" name="email">
        </div>

        <div class="flex flex-col input-field">
            <label class="block" for="name">Password</label>
            <input class="block" type="password" v-model="password" name="email">
        </div>

        <div 
            @click="register()"
            class="flex register-button cursor-pointer"
        >
            Register 
        </div>
    </div>
  </div>
</template>

<script>

export default {
    name: "Register",
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods:{
        register(){
            window.axios.post(`${location.origin}/register`, {"email" : this.email, "password" : this.password}, {})
                .then( (res) => {
                    localStorage.setItem('token', 'Bearer ' + res.data.token)
                    window.axios.defaults.headers.common['Authentication'] = localStorage.getItem('token')
                    this.$router.replace({name : 'home'})
                })
                .catch( (error) => {
                    alert("User exists")
                })
        }
    }
} 
</script>

<style scoped>
    .register {
        height: 400px;
        width: 400px;
        background-color: #374151;
        border-radius: 10px;
        padding: 50px 50px;
    }
    .input-field {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 100%;
        color: white;
    }
    .input-field input {
        background-color: #e3e3e3;
        border-radius: 10px;
        color: #111827;
    }
    .register-button {
        background: #111827;
        color: #e3e3e3;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>