export interface Notification {
    message: string,
    type: NotificationType.SUCCESS | NotificationType.ERROR | NotificationType.WARNING
}

export enum NotificationType {
    SUCCESS = 'success',
    ERROR = 'error',
    WARNING = 'warning'
}