import CreateNote from './components/CreateNote'
import List from './components/List'
import FavouriteList from './components/FavouriteList'

const routes = [
    {path: '/', component: List},
    {path: '/create', component: CreateNote},
    {path: '/list', component: List},
    {path: '/favourite-list', component: FavouriteList},
    {path: '*', redirect: '/list'},
];

export default routes
