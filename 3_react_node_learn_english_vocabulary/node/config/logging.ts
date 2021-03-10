const getTimeStamp = (): string => {
	return new Date().toISOString();
};

const info = (namespace: string, message: string): void => {
	console.log(`[${getTimeStamp()}] [INFO] [${namespace}] ${message}`);
};

export default { getTimeStamp, info };