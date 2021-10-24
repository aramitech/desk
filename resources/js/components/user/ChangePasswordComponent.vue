<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" :disabled="validated ? false : true" name="name" v-model="fields.name" type="text" placeholder="John Doe" required>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" :disabled="validated ? false : true" name="email" v-model="fields.email" value="" type="email" placeholder="me@example.com" required>
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>
                  <div class="form-group">
							<label>Password</label>
							<input class="form-control"  name="password" v-model="fields.password" value="" type="password" placeholder="********" required>
                            <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
						</div>
                        <div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control"  name="password_confirmation" v-model="fields.password_confirmation" value="" type="password" placeholder="********" required>
                            <div v-if="errors && errors.password_confirmation" class="text-danger">{{ errors.password_confirmation[0] }}</div>
						</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'userdata' ],
data() {
    return {
        action: '/desk/public/users/updatepassword', //edit action
        text: 'Updated Succesfully',
        redirect: '',
        //redirect: '/desk/public/users/profile',
        fields: {
            id:this.userdata.id,
            name:this.userdata.name,
            email:this.userdata.email,
        }
        }
    },

methods: {

    },
    mounted() {
        this.fields.id=this.userdata.id;
        this.fields.name=this.userdata.name;
        this.fields.email=this.userdata.email;
    }
}
</script>
