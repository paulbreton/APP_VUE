import { Notification } from 'element-ui';

export function error(message) {
  Notification.error({
    title: 'Echec',
    message: message,
    duration: 5000,
  })
}

export function success(message) {
  Notification.success({
    title: 'Succès',
    message: message,
    duration: 5000,
  })
}

export function commonError() {
  Notification.error({
    title: 'Erreur',
    message: 'Une erreur est survenue',
    duration: 3000,
  })
}