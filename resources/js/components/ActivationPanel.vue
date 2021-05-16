<template>
    <div class="activation_panel">
        <input
        :value="input"
        class="input"
        placeholder="Ключ активации..."
        >

        <button @click="activate()" class="activate_button">Активировать</button>
        
        <div class="activate_response" v-if="activate_response">{{ activate_response_text }}</div>

        <SimpleKeyboardAct @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
    </div>
</template>

<script>
    import SimpleKeyboardAct from './SimpleKeyboardAct';

    export default {
        data() {
            return {
                input: '',
                activate_response: false,
                activate_response_text: '',
            }
        },
        created() {
        },
        computed: {
        },
        methods: {
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            activate() {
                if(this.input === '') {
                    this.activate_response = true,
                    this.activate_response_text = 'Введите ключ!'
                } else {
                    axios
                        .get(`http://touchlab.su/api/key/view/${this.input}`)
                        .then(response => {
                            this.activate_response = true
                            if(response.data.status === 'waiting') {
                                axios
                                .post(`http://touchlab.su/api/key/activate/${this.input}`, {status: 'active'} )
                                .then(response => {
                                    this.activate_response = true
                                    this.activate_response_text = 'Активация прошла успешно'
                                    this.$parent.activated = 'n'
                                    axios
                                        .post(`/api/setup`, {nta: 'n'} )
                                        .then(response => {
                                            this.$parent.activated = 'n'
                                            window.location.reload();
                                        })
                                        .catch(err => {
                                            this.activate_response = true
                                            this.activate_response_text = 'Ошибка активации' + err
                                        })
                                })
                                .catch(err => {
                                    this.activate_response = true
                                    this.activate_response_text = 'Ошибка активации' + err
                                })
                            } else {
                                this.activate_response_text = 'Ключ уже был активирован'
                            }
                        })
                        .catch(err => {
                             this.activate_response = true
                            this.activate_response_text = 'Неверный ключ'
                        })
                }
            }
        },
        components: {
            SimpleKeyboardAct
        }
    }
</script>
<style scoped>
    .activation_panel {
        width: 100vw;
        height: 100vh;
        z-index: 9999999999999;
        position: absolute;
        left: 0;
        top: 0;
        background: white;
    }
    .activation_panel input {
        width: 30vw;
        display: block;
        margin: 0 auto;
        margin-top: 5vh;
        text-align: center;
    }
    .activate_button {
        width: 30vw;
        text-align: center;
        font-size: 2.5vh;
        box-shadow: none;
        border: 0;
        background-color: rgb(56, 175, 56);
        color: #fff;
        display: block;
        padding: 1.5vh;
        margin: 0 auto;
        margin-top: 1vh;
    }
    .activate_response {
        display: block;
        width: 30vw;
        font-size: 2vh;
        text-align: center;
        margin: 0 auto;
        margin-top: 2vh;
        color: red;
    }
</style>