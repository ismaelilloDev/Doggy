export function debounce<T extends (...args: any[]) => void>(func: T, wait: number) {
    let timeout: ReturnType<typeof setTimeout> | null;
    return function (this: ThisParameterType<T>, ...args: Parameters<T>) {
      const context = this;
      if (timeout) {
        clearTimeout(timeout);
      }
      timeout = setTimeout(() => {
        func.apply(context, args);
        timeout = null;
      }, wait);
    };
  }