export default ({ store, redirect}) => {
    const user = store.state.auth.user
    if (user === null || user.data.role.id < 3) {
        return redirect('/')
    }
}
