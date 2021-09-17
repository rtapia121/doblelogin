import AppForm from '../app-components/Form/AppForm';

Vue.component('post-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                content:  '' ,
                description: '',
            },
            mediaCollections:['url_cover_img']
        }
    }

});
