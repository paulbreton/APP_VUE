<template>
    <div>
        <el-row type="flex" justify="center">
            <h3>Information général</h3>
        </el-row>
        <p>Name</p>
        <el-input placeholder="Entrez quelque chose" v-model="name"></el-input>   
        <p>Email</p>
        <el-input placeholder="Entrez quelque chose" v-model="email"></el-input>   
        <el-row type="flex" justify="end" class="btn-submit">
            <el-button type="primary">Valider</el-button>
        </el-row>

    </div>
</template>