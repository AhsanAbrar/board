import '../css/tailwind.css'
import { app } from './app.js'
import { router } from './router'
import { i18n } from './plugins/i18n'
import './components/_index'

app.use(i18n)
app.use(router)
app.mount('#app')
