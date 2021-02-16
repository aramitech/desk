<template>
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
							<label>Name</label>
							<input class="form-control" name="name" v-model="fields.name" type="text" placeholder="John Doe" required>
                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="email" v-model="fields.email" value="" type="email" placeholder="me@example.com" required>
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
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/users/add', //save action
        text: 'Added Succesfully',
        redirect: '/users',
        }
    },

methods: {

    }
}
</script>
