import AppForm from '../app-components/Form/AppForm';

Vue.component('blog-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                description:  '' ,
                content:  '' ,
                post_date:  '' ,
                img_cover_name:  '' ,
                category_id:  '' ,
                
            }
        }
    }

});