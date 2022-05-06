import Pusher from 'pusher-js';

export default ({ env, store }, inject) => {
	Pusher.Runtime.createXHR = () => {
		var xhr = new XMLHttpRequest();
		xhr.withCredentials = true;
		return xhr;
	};
	const pusher = new Pusher('965ef84a79a7ba314ef3', {
		cluster: 'eu',
		encrypted: true,
		authEndpoint: 'http://localhost:8000/broadcasting/auth'
	});

	const leaveChannel = channelName => {
		const channel = pusher.channel(channelName);
		if (channel) channel.unsubscribe();
	};

  /*pusher.subscribe('comment').bind('SendComment', notification => {
		//store.commit('handleSomeEvent', notification);
    console.log("nouvelle Partie")
	});*/

	inject('pusher', pusher);
	inject('leaveChannel', leaveChannel);
};