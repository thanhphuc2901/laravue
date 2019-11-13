<template>
    <div>
        <h2>Danh sách học sinh</h2>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">Tạo mới</router-link>
                </div>
            </div><br />

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên học sinh</th>
                    <th>Giới tính</th>
                    <th>Lớp</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>GPA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in lists" :key="student.id">
                    <td>{{ student.student_code }}</td>
                    <td>{{ student.student_name }}</td>
                    <td>{{ student.gender }}</td>
                    <td>{{ student.grade }}</td>
                    <td>{{ student.address }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.GPA }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: student.id }}" class="btn btn-primary glyphicon glyphicon-edit"></router-link><button type="button" class="btn btn-danger glyphicon glyphicon-trash" @click.prevent="deleteStudent(student.id)"></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: []
            }
        },
        created() {
        let uri = 'http://localhost:8000/api/lists';
        this.axios.get(uri).then(response => {
            this.lists = response.data.data;
        });
        },
        methods: {
            deleteStudent(id) {
                let uri = `http://localhost:8000/api/list/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.lists.splice(this.lists.indexOf(id), 1);
                });
            }
        }
    }
</script>