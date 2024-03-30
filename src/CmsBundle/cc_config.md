# Trinity: Command & Control

## Required cronjobs

**Parsing available bundles from git**

```shell
# Om 02:00 op elke dag.
bin/console trinity:bundle:repo
```

**Updating C&C server data**

```shell
# Om 03:10 op elke dag.
bin/console trinity:server:update
```

**Uptime monitor**

```shell
# Elke 5 minuten.
bin/console trinity:server:monitor
```

## Required API key

| Title   | TRC                                            |
| ------- | ---------------------------------------------- |
| Hash    | 71cb7h9hd4m3k23ghpadk67ed8b663l8jcmb83hhhdk45  |
| Key     | mp3mkk7lhh79cp4domebj8jgkeilk9nlef2dpi53p61hgf |
| Options | Auth code, token and Client                    |

