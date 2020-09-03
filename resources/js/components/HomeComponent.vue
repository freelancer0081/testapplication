<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center font-weight-bold">Guest Book list</h4>
                <button  @click="addData" class="btn btn-primary"
                    >Add Data</button
                >
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in guestbook">
                            <td>{{ data.id }}</td>
                            <td>{{ data.first_name }}</td>
                            <td>{{ data.last_name }}</td>
                            <td>{{ data.email }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.gender }}</td>
                            <td>{{ data.address }}</td>
                            <td>
                                <button
                                    class="btn btn-primary"
                                    @click="editData(data)"
                                >
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button
                                    class="btn btn-danger"
                                    @click="deleteData(data)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    created() {
        this.$store.dispatch("fetch");
    },
    methods: {
        deleteData(post) {
            this.$store.dispatch("deleteData", post);
        },
        editData(post) {
           this.$store.dispatch("editData", {post:post,router:this.$router});
        },
        addData() {
           this.$store.dispatch("addData", {router:this.$router});
        }
    },
    computed: {
        ...mapGetters(["guestbook"])
    }
};
</script>
