const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const TaskList = () => import('./components/Task.vue' /* webpackChunkName: "resource/js/components/category/list" */)
// const CategoryCreate = () => import('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
// const CategoryEdit = () => import('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'taskList',
        path: '/tasks',
        component: TaskList
    }
    // {
    //     name: 'categoryEdit',
    //     path: '/category/:id/edit',
    //     component: CategoryEdit
    // },
    // {
    //     name: 'categoryAdd',
    //     path: '/category/add',
    //     component: CategoryCreate
    // }
]