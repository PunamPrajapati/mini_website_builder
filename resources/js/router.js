import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import MainComponent from './components/MainComponent.vue';
import DashboardComponent from './components/DashboardComponent.vue';
import WebsiteComponent from './components/Website/WebsiteComponent.vue';
import WebsiteCreateComponent from './components/Website/WebsiteCreateComponent.vue';
import WebsiteEditComponent from './components/Website/WebsiteEditComponent.vue';
import SectionComponent from './components/Section/SectionComponent.vue';
import SectionCreateComponent from './components/Section/SectionCreateComponent.vue';
import SectionEditComponent from './components/Section/SectionEditComponent.vue';
import SectionPreviewComponent from './components/Section/SectionPreviewComponent.vue';
import PageComponent from './components/PageComponent.vue';

const routes = [
    { path: '/', name: 'login', component: LoginComponent },
    { path: '/register', name: 'register', component: RegisterComponent },
    {
        path: '/',
        component: MainComponent,
        children: [
            { path: 'dashboard', name: 'dashboard', component: DashboardComponent },
            { path: 'websites', name: 'websites', component: WebsiteComponent },
            { path: 'websites/create', name: 'websitesCreate', component: WebsiteCreateComponent },
            { path: 'websites/edit/:id', name: 'websitesEdit', component: WebsiteEditComponent },
            { path: 'sections', name: 'sections', component: SectionComponent },
            { path: 'sections/create', name: 'sectionsCreate', component: SectionCreateComponent },
            { path: 'sections/edit/:id', name: 'sectionsEdit', component: SectionEditComponent },
            { path: 'sections/preview/:id', name: 'sectionsPreview', component: SectionPreviewComponent },
            { path: 'pages', name: 'pages', component: PageComponent },
        ],
    },

];

export default createRouter({
    history: createWebHistory(),
    routes,
});