import Vue from "vue";
import Vuex from "vuex";

export const state = {
    postData: [],
    editData:{},
    editflag:false,
};
export const getters = {
    guestbook: state => {
        // console.log(state.postData);
        return state.postData;
    },
    EditData: state => {
        // console.log(state.postData);
        return state.editData;
    },
};
export const mutations = {
    CREATE(state, post) {
        state.postData.unshift(post);
    },
    FETCH(state, posts) {
        return (state.postData = posts);
    },
    EDIT(state, editdata) {
        state.editflag=true;
        state.editData = editdata;
    },
    ADD(state, editdata) {
        state.editflag=false;
        state.editData = {};
    },
    DELETE(state, post) {
        let index = state.postData.findIndex(item => item.id === post.id);
        state.postData.splice(index, 1);
    }
};
export const actions = {
    create({ commit }, post) {
        axios
            .post("/api/guestbook/create", post)
            .then(res => {
              if(res.status==201)
              {
                  alert('Data Added');

              }
                // commit("CREATE", res.data.data);
            })
            .catch(err => {
                console.log(err);
            });
    },
    update({ commit }, post) {
        axios
            .post(`/api/guestbook/update/${post.editid}`, post)
            .then(res => {
                console.log(res);
             if(res.status==200)
              {
                  alert('Data Updated');
                  
              }
            })
            .catch(err => {
                console.log(err);
            });
    },
    fetch({ commit }) {
        axios
            .get("/api/guestbook")
            .then(res => {
                commit("FETCH", res.data.data);
            })
            .catch(err => {
                console.log(err);
            });
    },
    deleteData({ commit }, post) {
        axios
            .delete(`/api/guestbook/${post.id}`)
            .then(res => {
                if (res.data === "ok") commit("DELETE", post);
            })
            .catch(err => {
                console.log(err);
            });
    },
    editData({ commit }, payload) {
        const router = payload.router;
        console.log(payload.post);
        commit("EDIT", payload.post);
        router.push("/edit");
    },
    addData({ commit },payload)
    {
        const router = payload.router;
        commit("ADD");
        router.push("/create");
    }
};

Vue.use(Vuex);

export default new Vuex.Store({
    state,
    mutations,
    getters,
    actions
});
